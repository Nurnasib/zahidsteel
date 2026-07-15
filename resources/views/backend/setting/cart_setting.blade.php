@extends('layouts.backend.master')
@section('admin')

    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #eef2ff;
            --success: #10b981;
            --success-light: #ecfdf5;
            --warning: #f59e0b;
            --warning-light: #fffbeb;
            --danger: #ef4444;
            --danger-light: #fef2f2;
            --info: #0ea5e9;
            --info-light: #f0f9ff;
            --border: #e5e7eb;
            --text: #111827;
            --muted: #6b7280;
            --card-bg: #ffffff;
            --section-bg: #f9fafb;
            --toggle-size: 22px;
        }

        .os-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 768px) {
            .os-grid { grid-template-columns: 1fr; }
        }

        .os-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            transition: box-shadow 0.2s;
        }

        .os-card:hover {
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        }

        .os-card-header {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
            background: var(--section-bg);
        }

        .os-card-header .icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .icon-purple  { background: var(--primary-light); color: var(--primary); }
        .icon-green   { background: var(--success-light); color: var(--success); }
        .icon-yellow  { background: var(--warning-light); color: var(--warning); }
        .icon-blue    { background: var(--info-light);    color: var(--info); }
        .icon-red     { background: var(--danger-light);  color: var(--danger); }
        .icon-gray    { background: #f3f4f6; color: #374151; }

        .os-card-header h6 {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
        }

        .os-card-header small {
            font-size: 11px;
            color: var(--muted);
        }

        .os-card-body {
            padding: 18px;
        }

        /* Toggle Switch */
        .toggle-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .toggle-label {
            font-size: 13px;
            font-weight: 500;
            color: var(--text);
        }

        .toggle-switch {
            position: relative;
            width: 46px;
            height: var(--toggle-size);
            flex-shrink: 0;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            inset: 0;
            background: #d1d5db;
            border-radius: 999px;
            transition: background 0.25s;
        }

        .toggle-slider:before {
            content: '';
            position: absolute;
            height: 16px;
            width: 16px;
            left: 3px;
            bottom: 3px;
            background: white;
            border-radius: 50%;
            transition: transform 0.25s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }

        .toggle-switch input:checked + .toggle-slider { background: var(--primary); }
        .toggle-switch input:checked + .toggle-slider:before { transform: translateX(24px); }

        /* Input fields */
        .os-input-group {
            margin-top: 4px;
        }

        .os-input-group label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: var(--muted);
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .os-input-wrap {
            position: relative;
        }

        .os-input-wrap .prefix {
            position: absolute;
            left: 4px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 11px;
            color: var(--muted);
            pointer-events: none;
        }

        .os-input-wrap input,
        .os-input-wrap select {
            width: 100%;
            padding: 8px 12px 8px 28px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 13px;
            color: var(--text);
            background: white;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            -moz-appearance: textfield;
        }

        .os-input-wrap input::-webkit-outer-spin-button,
        .os-input-wrap input::-webkit-inner-spin-button { -webkit-appearance: none; }

        .os-input-wrap input:focus,
        .os-input-wrap select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,70,229,0.1);
        }

        .os-input-wrap.no-prefix input,
        .os-input-wrap.no-prefix select {
            padding-left: 12px;
        }

        .sub-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 12px;
        }

        .conditional-fields {
            margin-top: 12px;
            padding: 12px;
            background: var(--section-bg);
            border-radius: 8px;
            border: 1px solid var(--border);
            display: none;
        }

        .conditional-fields.show { display: block; }

        /* Submit area */
        .os-submit-bar {
            display: flex;
            justify-content: flex-end;
            padding: 18px 0 4px;
        }

        .os-submit-bar .btn-primary {
            padding: 10px 32px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            background: var(--primary);
            border-color: var(--primary);
            letter-spacing: 0.02em;
        }

        .os-submit-bar .btn-primary:hover {
            background: #4338ca;
            border-color: #4338ca;
        }

        .badge-indicator {
            font-size: 10px;
            padding: 2px 7px;
            border-radius: 999px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .badge-on  { background: var(--success-light); color: var(--success); }
        .badge-off { background: #f3f4f6; color: var(--muted); }
    </style>

    <div class="content">
        <div class="content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-cogs" aria-hidden="true"></i><a href="#">{{ $dashboard ?? 'Dashboard' }}</a></li>
                    <li><a>{{ $subTitle ?? 'Order Settings' }}</a></li>
                </ul>
            </div>
        </div>

        <div class="panel">
            <form id="orderSettingsForm" method="POST" action="{{ route('admin.cart-setting.add.update.info') }}">
                @csrf
                <div class="panel-content">

                    <div class="os-grid">
                        {{-- ④ Minimum Order --}}
                        <div class="os-card">
                            <div class="os-card-header">
                                <div class="icon icon-red"><i class="fa fa-percent"></i></div>
                                <div>
                                    <h6>Minimum Order</h6>
                                    <small>Limit the minimum cart value per order</small>
                                </div>
                            </div>
                            <div class="os-card-body">
                                <div class="toggle-row">
                                    <span class="toggle-label">Enable Minimum Order Amount</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" name="minimum_order_amount_enabled" value="1"
                                               {{ old('minimum_order_amount_enabled', $dataInfo->minimum_order_amount_enabled ?? false) ? 'checked' : '' }}
                                               onchange="toggleSection(this, 'minimum-order-amount-fields')">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div id="minimum-order-amount-fields"
                                     class="conditional-fields {{ old('minimum_order_amount_enabled', $dataInfo->minimum_order_amount_enabled ?? false) ? 'show' : '' }}">
                                    <div class="os-input-group">
                                        <label>Minimum Order Amount </label>
                                        <div class="os-input-wrap">

                                            <input type="number" name="minimum_order_amount" step="0.01" min="0"
                                                   placeholder="e.g. 15.00"
                                                   value="{{ old('minimum_order_amount', $dataInfo->minimum_order_amount ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ① Maximum Order --}}
                        <div class="os-card">
                            <div class="os-card-header">
                                <div class="icon icon-purple"><i class="fa fa-shopping-cart"></i></div>
                                <div>
                                    <h6>Maximum Order</h6>
                                    <small>Limit the maximum cart value per order</small>
                                </div>
                            </div>
                            <div class="os-card-body">
                                <div class="toggle-row">
                                    <span class="toggle-label">Enable Maximum Order Amount</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" name="maximum_order_amount_enabled" value="1"
                                               {{ old('maximum_order_amount_enabled', $dataInfo->maximum_order_amount_enabled ?? false) ? 'checked' : '' }}
                                               onchange="toggleSection(this, 'maximum-order-amount-fields')">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div id="maximum-order-amount-fields"
                                     class="conditional-fields {{ old('maximum_order_amount_enabled', $dataInfo->maximum_order_amount_enabled ?? false) ? 'show' : '' }}">
                                    <div class="os-input-group">
                                        <label>Maximum Order Amount </label>
                                        <div class="os-input-wrap">

                                            <input type="number" name="maximum_order_amount" step="0.01" min="0"
                                                   placeholder="e.g. 15.00"
                                                   value="{{ old('maximum_order_amount', $dataInfo->maximum_order_amount ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        {{-- ② Pre-Order System --}}
                        <div class="os-card">
                            <div class="os-card-header">
                                <div class="icon icon-yellow"><i class="fa fa-clock-o"></i></div>
                                <div>
                                    <h6>Pre-Order System</h6>
                                    <small>Allow customers to pre-order items</small>
                                </div>
                            </div>
                            <div class="os-card-body">
                                <div class="toggle-row">
                                    <span class="toggle-label">Enable Pre-Order</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" name="pre_order_enabled" value="1"
                                               {{ old('pre_order_enabled', $dataInfo->pre_order_enabled ?? false) ? 'checked' : '' }}
                                               onchange="toggleSection(this, 'pre-order-fields')">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div id="pre-order-fields"
                                     class="conditional-fields {{ old('pre_order_enabled', $dataInfo->pre_order_enabled ?? false) ? 'show' : '' }}">
                                    <div class="sub-row">
                                        <div class="os-input-group">
                                            <label>Pre-Order Type</label>
                                            <div class="os-input-wrap no-prefix">
                                                <select name="pre_order_type">
                                                    <option value="cart"  {{ old('pre_order_type', $dataInfo->pre_order_type ?? 'cart') == 'cart'    ? 'selected' : '' }}>Cart</option>
                                                    <option value="product" {{ old('pre_order_type', $dataInfo->pre_order_type ?? 'cart') == 'product' ? 'selected' : '' }}>Product</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="os-input-group">
                                            <label>Pre-Order Amount</label>
                                            <div class="os-input-wrap">
                                                <span class="prefix">%</span>
                                                <input type="number" name="pre_order_amount" step="0.01" min="0"
                                                       placeholder="0.00"
                                                       value="{{ old('pre_order_amount', $dataInfo->pre_order_amount ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ③ Shipping --}}
                        <div class="os-card">
                            <div class="os-card-header">
                                <div class="icon icon-blue"><i class="fa fa-truck"></i></div>
                                <div>
                                    <h6>Shipping Settings</h6>
                                    <small>Configure shipping charges &amp; free shipping</small>
                                </div>
                            </div>
                            <div class="os-card-body">
                                <div class="os-input-group" style="margin-bottom:14px;">
                                    <label>Default Shipping Charge</label>
                                    <div class="os-input-wrap">
                                        <span class="prefix">DBT</span>
                                        <input type="number" name="default_shipping_charge" step="0.01" min="0"
                                               placeholder="0.00"
                                               value="{{ old('default_shipping_charge', $dataInfo->default_shipping_charge ?? '') }}">
                                    </div>
                                </div>

                                <div class="toggle-row">
                                    <span class="toggle-label">Enable Free Shipping</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" name="free_shipping_enabled" value="1"
                                               {{ old('free_shipping_enabled', $dataInfo->free_shipping_enabled ?? false) ? 'checked' : '' }}
                                               onchange="toggleSection(this, 'free-shipping-fields')">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div id="free-shipping-fields"
                                     class="conditional-fields {{ old('free_shipping_enabled', $dataInfo->free_shipping_enabled ?? false) ? 'show' : '' }}">
                                    <div class="os-input-group">
                                        <label>Minimum Order Amount for Free Shipping</label>
                                        <div class="os-input-wrap">
                                            <span class="prefix">DBT</span>
                                            <input type="number" name="free_shipping_amount" step="0.01" min="0"
                                                   placeholder="e.g. 100.00"
                                                   value="{{ old('free_shipping_amount', $dataInfo->free_shipping_amount ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ④ Tax --}}
                        <div class="os-card">
                            <div class="os-card-header">
                                <div class="icon icon-red"><i class="fa fa-percent"></i></div>
                                <div>
                                    <h6>Tax Settings</h6>
                                    <small>Apply tax percentage to orders</small>
                                </div>
                            </div>
                            <div class="os-card-body">
                                <div class="toggle-row">
                                    <span class="toggle-label">Enable Tax</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" name="tax_enabled" value="1"
                                               {{ old('tax_enabled', $dataInfo->tax_enabled ?? false) ? 'checked' : '' }}
                                               onchange="toggleSection(this, 'tax-fields')">
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>

                                <div id="tax-fields"
                                     class="conditional-fields {{ old('tax_enabled', $dataInfo->tax_enabled ?? false) ? 'show' : '' }}">
                                    <div class="os-input-group">
                                        <label>Tax Percentage (%)</label>
                                        <div class="os-input-wrap">
                                            <span class="prefix">%</span>
                                            <input type="number" name="tax_percentage" step="0.01" min="0" max="100"
                                                   placeholder="e.g. 15.00"
                                                   value="{{ old('tax_percentage', $dataInfo->tax_percentage ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ⑤ Coupon --}}
                        <div class="os-card">
                            <div class="os-card-header">
                                <div class="icon icon-green"><i class="fa fa-tag"></i></div>
                                <div>
                                    <h6>Coupon / Discount</h6>
                                    <small>Allow coupon codes at checkout</small>
                                </div>
                            </div>
                            <div class="os-card-body">
                                <div class="toggle-row">
                                    <span class="toggle-label">Enable Coupon System</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" name="coupon_enabled" value="1"
                                            {{ old('coupon_enabled', $dataInfo->coupon_enabled ?? true) ? 'checked' : '' }}>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                                <p style="font-size:12px;color:var(--muted);margin:0;">
                                    When enabled, customers can apply discount coupon codes during checkout.
                                </p>
                            </div>
                        </div>

                        {{-- ⑥ COD --}}
                        <div class="os-card">
                            <div class="os-card-header">
                                <div class="icon icon-yellow"><i class="fa fa-money"></i></div>
                                <div>
                                    <h6>Cash On Delivery (COD)</h6>
                                    <small>Allow pay-on-delivery option</small>
                                </div>
                            </div>
                            <div class="os-card-body">
                                <div class="toggle-row">
                                    <span class="toggle-label">Enable COD</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" name="cod_enabled" value="1"
                                            {{ old('cod_enabled', $dataInfo->cod_enabled ?? true) ? 'checked' : '' }}>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                                <p style="font-size:12px;color:var(--muted);margin:0;">
                                    Customers can choose to pay with cash upon delivery of their order.
                                </p>
                            </div>
                        </div>

                        {{-- ⑦ Guest Checkout --}}
                        <div class="os-card" style="grid-column: 1 / -1;">
                            <div class="os-card-header">
                                <div class="icon icon-gray"><i class="fa fa-user-o"></i></div>
                                <div>
                                    <h6>Guest Checkout</h6>
                                    <small>Allow purchases without an account</small>
                                </div>
                            </div>
                            <div class="os-card-body" style="display:flex;align-items:center;justify-content:space-between;gap:20px;">
                                <p style="font-size:13px;color:var(--muted);margin:0;max-width:600px;">
                                    When guest checkout is enabled, customers can complete a purchase without creating or logging into an account. Disabling this will require all customers to register before ordering.
                                </p>
                                <div class="toggle-row" style="margin:0;flex-shrink:0;">
                                    <label class="toggle-switch" style="width:52px;height:26px;">
                                        <input type="checkbox" name="guest_checkout_enabled" value="1"
                                            {{ old('guest_checkout_enabled', $dataInfo->guest_checkout_enabled ?? true) ? 'checked' : '' }}>
                                        <span class="toggle-slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>{{-- /os-grid --}}

                    <div class="os-submit-bar">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save" style="margin-right:6px;"></i> Save Settings
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleSection(checkbox, sectionId) {
            const section = document.getElementById(sectionId);
            if (!section) return;
            if (checkbox.checked) {
                section.classList.add('show');
            } else {
                section.classList.remove('show');
            }
        }
    </script>
@endsection
