<div class="wpf_payment_info">
    <div class="wpf_payment_info_item wpf_payment_info_item_order_id">
        <div class="wpf_item_heading"><?php _e('Order ID:');?></div>
        <div class="wpf_item_value">#<?php echo $submission->id; ?></div>
    </div>
    <div class="wpf_payment_info_item wpf_payment_info_item_date">
        <div class="wpf_item_heading"><?php _e('Date:');?></div>
        <div class="wpf_item_value"><?php echo date(get_option( 'date_format' ), strtotime($submission->created_at)); ?></div>
    </div>
    <?php if($submission->payment_total): ?>
    <?php
        $currencySetting = \WPPayForm\Classes\GeneralSettings::getGlobalCurrencySettings($submission->form_id);
        $currencySetting['currency_sign'] = \WPPayForm\Classes\GeneralSettings::getCurrencySymbol($submission->currency);
    ?>
    <div class="wpf_payment_info_item wpf_payment_info_item_total">
        <div class="wpf_item_heading"><?php _e('Total:');?></div>
        <div class="wpf_item_value"><?php echo wpfFormattedMoney($submission->payment_total, $currencySetting); ?></div>
    </div>
    <?php endif; ?>
    <?php if($submission->payment_method): ?>
        <div class="wpf_payment_info_item wpf_payment_info_item_payment_method">
            <div class="wpf_item_heading"><?php _e('Payment Method:');?></div>
            <div class="wpf_item_value"><?php echo ucfirst($submission->payment_method); ?></div>
        </div>
    <?php endif; ?>
    <?php if($submission->payment_status): ?>
        <div class="wpf_payment_info_item wpf_payment_info_item_payment_status">
            <div class="wpf_item_heading"><?php _e('Payment Status:');?></div>
            <div class="wpf_item_value"><?php echo ucfirst($submission->payment_status); ?></div>
        </div>
    <?php endif; ?>
</div>
<style type="text/css">
    .wpf_payment_info {
        width: 100%;
        -webkit-box-shadow: 0px -2px #e3e8ee;
        box-shadow: 0px -2px #e3e8ee;
        background-color: rgb(247, 250, 252);
        color: rgb(56, 56, 56);
    }
    .wpf_payment_info_item {
        display: inline-block;
        margin-right: 0px;
        -webkit-box-shadow: inset -1px 0 #e3e8ee;
        box-shadow: inset -1px 0 #e3e8ee;
        padding: 12px;
    }
    .wpf_payment_info_item:last-child {
        box-shadow: none;
    }
    .wpf_payment_info_item .wpf_item_heading {
        font-size: 14px;
        font-weight: bold;
    }
    .wpf_payment_info_item .wpf_item_value {
        font-size: 14px;
    }
</style>