<template>
    <v-app>
        <v-nagivation-drawer app></v-nagivation-drawer>
        <v-toolbar app></v-toolbar>
        <v-content>
            <v-container fluid>
                <router-link tag="li" to "/">Home</router-link>
                <router-link tag="li" to "/about">About</router-link>
                <!-- nothingggggg -->
                <router-view></router-view>
            </v-container>
        </v-content>
        <v-footer app></v-footer>
    </v-app>
</template>

<script>
export default {}
</script>
