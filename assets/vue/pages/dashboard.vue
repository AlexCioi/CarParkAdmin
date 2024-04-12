<script>
import axios from 'axios';
import Chart from '../components/chart';

export default {
    name: 'DashBoard',
    components: {
        Chart,
    },
    data() {
        return {
            carParks: [],
            data: {
                labels: [
                    'Occupied',
                    'Free',
                ],
                datasets: [{
                    data: [],
                    backgroundColor: [
                        'rgb(204, 0, 0)',
                        'rgb(0, 143, 51)',
                    ],
                    hoverOffset: 4,
                }],
            },
            width: 100,
            height: 100,
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
            },
        };
    },
    methods: {
        async getCarParks() {
            axios
                .get('/api/carParks')
                .then((response) => {
                    this.carParks = response.data;
                    console.log(this.carParks);
                })
                .catch((error) => {
                    console.log('Error fetching carParks');
                });
        },
        getChartData(park) {
            return {
                labels: ['Occupied', 'Free'],
                datasets: [{
                    data: [park.takenSpaces, park.capacity - park.takenSpaces],
                    backgroundColor: ['rgb(204, 0, 0)', 'rgb(0, 143, 51)'],
                    hoverOffset: 4,
                }],
            };
        },
    },
    mounted() {
        this.getCarParks();
    },
};
</script>

<template>
    <div class="container">
        <div
            class="w-25"
            v-for="park in carParks"
            :key="park.id">
            <h3>{{park.name}}</h3>
            <Chart
                :data="getChartData(park)"
                :chart-options="chartOptions"
                :chart-id="park.id"
                :width="width"
                :height="height"
            />
        </div>
    </div>
</template>

<style scoped>

</style>
