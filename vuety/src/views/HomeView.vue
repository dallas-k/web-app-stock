<template>
  <div id="app">
    <headerTemp />
    <footerTemp />
  </div>
</template>

<script>
  import headerTemp from '../components/header'
  import footerTemp from '../components/footer'

  export default {
    name: 'Home',

    components: {
      headerTemp,
      footerTemp
    },
  }
</script>
