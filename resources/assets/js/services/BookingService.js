import axios from 'axios';

export async function fetchActiveBookings(query) {
    const { data } = await axios.get('/bookings', {
        params: {
            active: 1,
            q: query
        },
    });

    return data.data.map(b => ({
        ...b,
        label: `${b.room.number} - ${b.customer.name}`,
    }));
}
