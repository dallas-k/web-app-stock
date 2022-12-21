<template>
    <v-bottom-navigation
        :value="value"
        color="teal"
        grow
    >
        <v-btn>
        <span>알림</span>

        <v-icon>mdi-bell</v-icon>
        </v-btn>

        <v-btn>
        <span>내 자산</span>

        <v-icon>mdi-heart</v-icon>
        </v-btn>

        <v-btn>
        <span>복리 계산기</span>

        <v-icon>mdi-piggy-bank</v-icon>
        </v-btn>

        <v-btn>
        <span>대출 계산기</span>

        <v-icon>mdi-calculator</v-icon>
        </v-btn>
    </v-bottom-navigation>
</template>


<script>
  export default {
    data: () => ({ value: 1 }),
  }
</script>