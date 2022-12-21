<template>
    <v-card
        class="mx-auto overflow-hidden"
        height="400"
    >
        <v-app-bar
        color="deep-purple"
        dark
        >
        <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

        <v-toolbar-title>s&p500</v-toolbar-title>
        <v-toolbar-title>usdkrw</v-toolbar-title>
        </v-app-bar>

        <v-navigation-drawer
        v-model="drawer"
        absolute
        temporary
        >
        <v-list nav dense>
            <v-list-item-group
            v-model="group"
            active-class="deep-purple--text text--accent-4"
            >
            <v-list-item>
                <v-list-item-icon>
                <v-icon>mdi-home-variant</v-icon>
                </v-list-item-icon>
                <v-list-item-title>홈</v-list-item-title>
            </v-list-item>

            <v-list-item>
                <v-list-item-icon>
                <v-icon>mdi-table-of-contents</v-icon>
                </v-list-item-icon>
                <v-list-item-title>주식 관리</v-list-item-title>
            </v-list-item>

            <v-list-item>
                <v-list-item-icon>
                <v-icon>mdi-chart-bubble</v-icon>
                </v-list-item-icon>
                <v-list-item-title>포트폴리오</v-list-item-title>
            </v-list-item>

            <v-list-item>
                <v-list-item-icon>
                <v-icon>mdi-text-box-outline</v-icon>
                </v-list-item-icon>
                <v-list-item-title>재무제표</v-list-item-title>
            </v-list-item>

            <v-list-item>
                <v-list-item-icon>
                <v-icon>mdi-newspaper-variant-outline</v-icon>
                </v-list-item-icon>
                <v-list-item-title>주요 경제 지표</v-list-item-title>
            </v-list-item>
            </v-list-item-group>
        </v-list>
        </v-navigation-drawer>
    </v-card>
</template>

<script>
export default {
data: () => ({
    drawer: false,
    group: null,
}),
}
</script>