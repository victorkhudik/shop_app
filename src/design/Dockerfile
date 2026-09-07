FROM node:20-alpine

WORKDIR /app

# Копируем конфиги зависимостей
COPY package*.json ./

# Устанавливаем пакеты
RUN npm install

# Копируем остальные исходники
COPY . .

EXPOSE 5173

CMD ["npx", "vite", "--host", "0.0.0.0", "--port", "5173"]