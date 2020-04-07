import axios from 'axios';

class RoomService {
    static async findAll() {
        const { data } = await axios.get('/rooms');

        return data.data;
    }
}

export default RoomService;
