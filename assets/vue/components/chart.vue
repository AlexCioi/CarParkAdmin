<script>
import { Doughnut } from 'vue-chartjs';
import {
    Chart as ChartJS, Title,
    Tooltip,
    Legend,
    ArcElement,
    CategoryScale,
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale);

export default {
    name: 'ChartComponent',
    components: {
        Doughnut,
    },
    props: {
        data: {
            type: Object,
            default: () => {},
        },
        chartId: {
            type: Number,
        },
        width: {
            type: Number,
            default: 400,
        },
        height: {
            type: Number,
            default: 400,
        },
        chartOptions: {
            type: Object,
            default: () => {},
        },
    },
};
</script>

<template>
    <Doughnut
        :data="data"
        :chart-options="chartOptions"
        :chart-id="chartId"
        :width="width"
        :height="height"
    />
</template>

<style scoped>

</style>
