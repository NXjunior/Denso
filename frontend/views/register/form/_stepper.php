<div class="bs-stepper-header mb-4" role="tablist" style="overflow:auto">
  <div class="step <?php echo $stage >= 1 ? 'active' : '' ?>" data-target="#stepper-1">
    <a href="/register" class="step-trigger btn btn-ghost-secondary rounded-pill" role="tab" id="stepper_trigger1" aria-controls="stepper-1" aria-selected="true">
      <span class="bs-stepper-circle fa-xl">
        <span class="fas fa-file-check" aria-hidden="true"></span>
      </span>
      <span class="bs-stepper-label" data-coreui-i18n="consentForm">แบบฟอร์มยินยอม</span>
    </a>
  </div>
  <div class="bs-stepper-line"></div>
  <div class="step <?php echo $stage >= 2 ? 'active' : '' ?>" data-target="#stepper-2">
    <a href="/register/slot" class="step-trigger btn btn-ghost-secondary rounded-pill" role=" tab" id="stepper_trigger2" aria-controls="stepper-2" aria-selected="false">
      <span class="bs-stepper-circle fa-xl">
        <span class="fas fa-calendar-circle-plus" aria-hidden="true"></span>
      </span>
      <span class="bs-stepper-label" data-coreui-i18n="bookTime">จองเวลา</span>
    </a>
  </div>
  <div class="bs-stepper-line"></div>
  <div class="step <?php echo $stage >= 3 ? 'active' : '' ?>" data-target="#stepper-3">
    <a href="/register/qr" class="step-trigger btn btn-ghost-secondary rounded-pill" role=" tab" id="stepper_trigger3" aria-controls="stepper-3" aria-selected="false">
      <span class="bs-stepper-circle fa-xl">
        <span class="fas fa-qrcode" aria-hidden="true"></span>
      </span>
      <span class="bs-stepper-label" data-coreui-i18n="qrCode">QR Code</span>
    </a>
  </div>
</div>