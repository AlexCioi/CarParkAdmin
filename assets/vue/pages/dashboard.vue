<script>
import Chart from '../components/chart';
import Sidebar from '../components/sidebar';

export default {
    name: 'DashBoard',
    components: {
        Sidebar,
        Chart,
    },
};
</script>

<template>
    <div class="w-50">
        <Chart />
    </div>
</template>

<style scoped>

</style>
