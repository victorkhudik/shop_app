import {createOrder} from "../../../services/api.js";
export const buyProduct = async ({productId, navigate}) => {
    const data = await createOrder(productId);

    if (data.order_uuid && navigate) {
        navigate(`/orders/${data.order_uuid}`);
    }
};