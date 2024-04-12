<script>
import axios from 'axios';

export default {
    name: 'CarParks',
    data() {
        return {
            carParks: [],
        };
    },
    methods: {
        async getCarParks() {
            axios
                .get('/api/fetchCarParks')
                .then((response) => {
                    this.carParks = response.data;
                })
                .catch((error) => {
                    console.log('Error fetching car parks'.error);
                });
        },
    },
};
</script>

<template>
    <div>
        <a v-for="park in carParks"
           :key="park.id">
            href="/dashboard/park/id"> {{park.name}} </a>
    </div>
</template>

<style scoped>

</style>
