import Create from './components/Create.vue';
import Welcome from './components/Welcome.vue';
import Show from "./components/Show.vue"

const routes = [
    { path: '/welcome', component: Welcome },
    { path: '/create', component: Create },
    { path: '/show', component: Show },
];

export default routes;
