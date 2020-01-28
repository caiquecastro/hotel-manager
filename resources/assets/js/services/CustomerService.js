import axios from 'axios';

export async function searchCustomer(query) {
    const { data } = await axios.get('/customers', {
        params: {
            q: query
        },
    });

    return data.data.map(customer => ({
        ...customer,
        label: `${customer.name} ${customer.active_booking ? '(' + customer.active_booking.room_id + ')' : ''}`,
    }));
}
