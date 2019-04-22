<template>
    <div>
        <div id="earned-certificates-inner-holder" class="row column">
            <div class="col-2 earned-certificate-left-img-holder d-flex align-items-center justify-content-center">
                <img src="/images/olive-branches-icon.png" alt="">
            </div>
            <div class="col-xl-6 col-10 earned-certificate-title-holder">
                <p><slot name="certificate-title"></slot></p>
                <div class="certificate-info">
                    <span><i class="fa fa-user"></i><slot name="user-name"></slot></span>
                    <span><i class="fa fa-calendar"></i>2019-02-10</span>
                </div>
            </div>
            <div class="col-xl-4 download-btn-holder d-flex align-items-center justify-content-end">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">Download</button>
                    <button type="button" class="btn btn-secondary"><img src="/images/download-icon.png" alt=""></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 download-btn-holder-mob d-flex align-items-center justify-content-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">Download</button>
                    <button type="button" class="btn btn-secondary"><img src="/images/download-icon.png" alt=""></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
