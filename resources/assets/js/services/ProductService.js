import axios from 'axios';

export async function searchProduct(query) {
    const { data } = await axios.get('/products', {
        params: {
            q: query
        },
    });

    return data.data.map(p => ({
        ...p,
        label: `${p.barcode} ${p.display_name || p.name}`,
    }));
}
