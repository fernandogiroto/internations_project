import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

// Components
import UsersListComponent from './components/UsersListComponent.vue';
import GroupsListComponent from './components/GroupsListComponent.vue';
import CreateUserComponent from './components/CreateUserComponent.vue';
import CreateGroupComponent from './components/CreateGroupComponent.vue';
import BannerComponent from './components/BannerComponent.vue';
import JoinGroupComponent from './components/JoinGroupComponent.vue';
import EditGroupComponent from './components/EditGroupComponent.vue';

// Pages
import AppPage from './pages/AppPage.vue';
import LoginPage from './pages/LoginPage.vue';

app.component('users-list-component', UsersListComponent);
app.component('groups-list-component', GroupsListComponent);
app.component('create-user-component', CreateUserComponent);
app.component('create-group-component', CreateGroupComponent);
app.component('banner-component', BannerComponent);
app.component('join-group-component', JoinGroupComponent);
app.component('edit-group-component', EditGroupComponent);
app.component('app-page', AppPage);
app.component('login-page', LoginPage);

app.mount('#app');
