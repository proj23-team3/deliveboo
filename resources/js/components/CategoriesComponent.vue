<template>
    <div class="card_container">
        <div class="card" v-for="category in categories" :key="category.id">
            <div class="">{{category.name}}</div>
           
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                categories: ""
            }
            
        },
        mounted() {
            axios.get('../api/categories').then(response => {
                console.log(response);
                this.categories =response.data.response;
                
                    });
            
        }
    }
</script>