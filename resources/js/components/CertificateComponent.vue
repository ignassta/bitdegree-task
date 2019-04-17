<template>
    <div id="featured-certificate-holder" class="column">
        <div id="certificates-medal-holder">
            <slot name="certificates-medal"></slot>
            <div id="certificates-count">{{ certificatesCount }}</div>
        </div>
        <div id="certificates-count-text"><slot name="certificates-count-text"></slot></div>
        <div id="featured-certificate-header"><slot name="featured-certificate-header"></slot></div>
        <img id="featured-certificate-img" src="/images/certificate-img.jpg" alt="">
    </div>
</template>

<script>
export default {
    data() {
        return {
            certificatesCount: '18',
        }
    }
}
</script>

