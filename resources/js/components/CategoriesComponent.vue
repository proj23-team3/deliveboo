<template>
    <div class="card_container">
        <div class="checkbox" v-for="category in categories" :key="category.id">
            <label>
                <input type="checkbox" class="icheck" checked />
                {{ category.name }}
            </label>
        </div>
        <p>{{ choose_cat }}</p>
    </div>
</template>

<script>
export default {
    props: ["choose_cat"],
    data() {
        return {
            categories: ""
        };
    },
    mounted() {
        axios.get("../api/categories").then(response => {
            console.log(response);
            this.categories = response.data.response;
        });
    }
};
</script>
