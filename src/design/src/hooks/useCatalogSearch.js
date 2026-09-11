import { useState, useEffect, useRef } from 'react';

export function useCatalogSearch(query) {
    const [results, setResults] = useState([]);
    const [loading, setLoading] = useState(false);
    const abortControllerRef = useRef(null);

    useEffect(() => {
        if (abortControllerRef.current) {
            abortControllerRef.current.abort();
        }

        if (!query.trim()) {
            setResults([]);
            setLoading(false);
            return;
        }

        setLoading(true);

        // Debounce 300ms для удаления дублирования запросов в процессе ввода
        const timerId = setTimeout(async () => {
            const controller = new AbortController();
            abortControllerRef.current = controller;

            try {
                const response = await fetch(`/api/v1/catalog/products?query=${encodeURIComponent(query)}`, {
                    signal: controller.signal,
                    headers: { 'Accept': 'application/json' }
                });

                if (!response.ok) {
                    throw new Error(`Ошибка сервера: ${response.status}`);
                }

                const data = await response.json();
                setResults( data);

            } catch (error) {
                if (error.name !== 'AbortError') {
                    console.error('Ошибка при загрузке каталога:', error);
                }
            } finally {
                if (!controller.signal.aborted) {
                    setLoading(false);
                }
            }
        }, 300);

        return () => {
            clearTimeout(timerId);
            if (abortControllerRef.current) {
                abortControllerRef.current.abort();
            }
        };
    }, [query]); // Зависимость только от строки запроса

    return { results, loading };
}