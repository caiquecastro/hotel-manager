<template>
    <form @submit.prevent="onSubmit" :method="method" :action="action">
        <div class="form-group">
            <label for="name" class="label">Nome</label>
            <input type="text" v-model="form.name" class="form-control" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</template>


<script>
import axios from 'axios';
import { Money } from 'v-money';

export default {
    props: {
        action: {},
        method: {},
        initialData: {},
    },
    data () {
        return {
            form: {
                name: '',
            },
        }
    },

    created() {
        this.form = {
            ...this.initialData,
        };
    },

    methods: {
        async onSubmit() {
            try {
                const { data } = await axios({
                    method: this.method,
                    url: this.action,
                    data: this.form
                });

                this.$noty.success('Tipo de Quarto salvo com sucesso!');

                const redirectUrl = `/types/${data.id}/edit`;

                if (redirectUrl !== window.location.pathname) {
                    window.location.href = redirectUrl;
                }
            } catch (err) {
                this.$noty.error('Erro ao salvar o tipo de quarto.');
            }
        }
    }
}
</script>
