<template>
<div class="watermark">
  <router-view></router-view>
</div>
</template>
<script setup>

</script>

<style scoped>
.watermark{
    background-image: url('/logos/watermark.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
</style>
