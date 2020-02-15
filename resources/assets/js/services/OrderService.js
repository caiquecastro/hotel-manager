import axios from 'axios';

export async function searchOrders(query) {
    const { data } = await axios.get('/orders', {
        params: {
            status: 'open',
            q: query
        },
    });

    return data.map(order => ({
        ...order,
        label: order.number,
    }));
}
