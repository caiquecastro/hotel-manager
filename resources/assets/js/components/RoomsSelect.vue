<template>
    <select
        id="room_id"
        name="room_id"
        :value="value"
        class="form-control"
        :class="{ 'is-invalid': invalid }"
        @change="onChange"
    >
        <option :value="null">Selecione</option>
        <option
            v-for="room in rooms"
            :key="room.id"
            :value="room.id"
            :selected="room.id == value"
        >
            {{ room.number }}
        </option>
    </select>
</template>

<script>
import RoomService from '../services/RoomService';

export default {
    props: {
        value: {},
        invalid: {},
    },
    data() {
        return {
            rooms: [],
        };
    },
    async created() {
        this.rooms = await RoomService.findAll();
    },
    methods: {
        onChange(e) {
            this.$emit('input', e.target.value || null);
        }
    }
};
</script>
