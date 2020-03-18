<template>
    <input
        type="datetime-local"
        class="form-control"
        :value="value"
        @input="onInput"
        :class="{ 'is-invalid': invalid }"
    >
</template>

<script>
export default {
    props: {
        value: {},
        invalid: {},
    },
    methods: {
        onInput(e) {
            this.$emit('input', e.target.value);
        },
    },
};
</script>
