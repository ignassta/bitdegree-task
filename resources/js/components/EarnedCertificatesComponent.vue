<template>
    <div id="earned-certificates-holder">
        <h2 id="earned-certificates-header"><slot name="earned-certificates-header"></slot></h2>
        <div id="earned-certificates-inner-holder" class="row column" v-for="certificate in certificates.slice(0, 4)" :key="certificate.id">
            <div class="col-2 earned-certificate-left-img-holder d-flex align-items-center justify-content-center">
                <slot name="earned-certificate-left-img"></slot>
            </div>
            <div class="col-xl-6 col-10 earned-certificate-title-holder">
                <p>{{ certificate.title }}</p>
                <div class="certificate-info">
                    <span><i class="fa fa-user"></i> {{ certificate.userName }} </span>
                    <span><i class="fa fa-calendar"></i>{{ certificate.date }}</span>
                </div>
            </div>
            <div class="col-xl-4 download-btn-holder d-flex align-items-center justify-content-end">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary"><slot name="download-certificate-btn-text"></slot></button>
                    <button type="button" class="btn btn-secondary"><img src="/images/download-icon.png" alt=""></button>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button id="show-all-btn"><slot name="show-all-btn-text"></slot></button>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            certificates: [
                {title: 'Blender Tutorial: How to Master Blender Animation & 3D Game Modeling', userName: 'Mark Price', date: '2019-02-10'},
                {title: 'Blender Tutorial: How to Master Blender Animation & 3D Game Modeling', userName: 'Mark Price', date: '2019-02-10'},
                {title: 'Blender Tutorial: How to Master Blender Animation & 3D Game Modeling', userName: 'Mark Price', date: '2019-02-10'},
                {title: 'Blender Tutorial: How to Master Blender Animation & 3D Game Modeling', userName: 'Mark Price', date: '2019-02-10'},
                {title: 'Blender Tutorial: How to Master Blender Animation & 3D Game Modeling', userName: 'Mark Price', date: '2019-02-10'},
                {title: 'Blender Tutorial: How to Master Blender Animation & 3D Game Modeling', userName: 'Mark Price', date: '2019-02-10'},
            ]
        }
    }
}
</script>
