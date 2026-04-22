<div class="wrap cce-admin-wrap">
    <h1>Funnel Engine</h1>
    <p class="description">Your Funnel is the bridge between a complete stranger and a happy client. Use the pre-built templates below to launch your acquisition sequence in minutes.</p>
    <hr class="wp-header-end">

    <div class="cce-guide-box">
        <h4><span class="dashicons dashicons-external"></span> Funnel Launch Roadmap</h4>
        <p>Follow this sequence to ensure your funnel converts visitors into high-ticket clients:</p>
        <div style="display: flex; gap: 20px; margin-top: 15px;">
            <div style="flex: 1; border-right: 1px solid var(--cce-border); padding-right: 15px;">
                <strong style="color: var(--cce-primary); display: block; margin-bottom: 5px;">1. Define Offer</strong>
                <span style="font-size: 0.8rem; color: var(--cce-text-light);">Define your transformation before building.</span>
            </div>
            <div style="flex: 1; border-right: 1px solid var(--cce-border); padding-right: 15px;">
                <strong style="color: var(--cce-primary); display: block; margin-bottom: 5px;">2. Deploy Template</strong>
                <span style="font-size: 0.8rem; color: var(--cce-text-light);">Choose a framework below that fits your goal.</span>
            </div>
            <div style="flex: 1; border-right: 1px solid var(--cce-border); padding-right: 15px;">
                <strong style="color: var(--cce-primary); display: block; margin-bottom: 5px;">3. Customize</strong>
                <span style="font-size: 0.8rem; color: var(--cce-text-light);">Add your copy, videos, and branding.</span>
            </div>
            <div style="flex: 1;">
                <strong style="color: var(--cce-primary); display: block; margin-bottom: 5px;">4. Connect CRM</strong>
                <span style="font-size: 0.8rem; color: var(--cce-text-light);">Ensure leads flow into your sales pipeline.</span>
            </div>
        </div>
    </div>

    <?php
    global $wpdb;
    $user_id = get_current_user_id();
    $funnels = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}cce_funnels WHERE user_id = %d", $user_id ) );
    $offers = $wpdb->get_results( $wpdb->prepare( "SELECT id, title FROM {$wpdb->prefix}cce_offers WHERE is_active = 1 AND user_id = %d", $user_id ) );
    ?>

    <div class="cce-card">
        <h3>Your Funnels</h3>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Shortcode</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($funnels): foreach ( $funnels as $funnel ): ?>
                    <tr>
                        <td><strong><?php echo esc_html( $funnel->title ); ?></strong></td>
                        <td><?php echo esc_html( strtoupper( $funnel->type ) ); ?></td>
                        <td><?php echo esc_html( strtoupper( $funnel->status ) ); ?></td>
                        <td>
                            <code>[cce_funnel id="<?php echo $funnel->id; ?>"]</code>
                            <button class="button button-small cce-copy-shortcode" data-shortcode='[cce_funnel id="<?php echo $funnel->id; ?>"]'>Copy</button>
                        </td>
                        <td>
                            <a href="#" class="button cce-view-steps" data-funnel-id="<?php echo $funnel->id; ?>">View Steps</a>
                            <button class="button cce-duplicate-funnel" data-funnel-id="<?php echo $funnel->id; ?>">Duplicate</button>
                            <button class="button button-link-delete cce-delete-funnel" data-funnel-id="<?php echo $funnel->id; ?>" style="color:#d63638;">Delete</button>
                        </td>
                    </tr>
                    <tr id="funnel-steps-<?php echo $funnel->id; ?>" style="display:none;">
                        <td colspan="5" style="background:#f9f9f9; padding:15px;">
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <h4>Steps in this funnel:</h4>
                                <button class="button button-small cce-add-step-btn" data-funnel-id="<?php echo $funnel->id; ?>">+ Add Step</button>
                            </div>
                            <div class="steps-container-<?php echo $funnel->id; ?>" style="margin-top:10px;">
                                <em>Loading steps...</em>
                            </div>
                            <div class="funnel-viz-<?php echo $funnel->id; ?>" style="margin-top:20px; border-top:1px solid #ddd; padding-top:20px; display:none;">
                                <h5>Visual Performance (Conversion Waterfall)</h5>
                                <div class="viz-track-<?php echo $funnel->id; ?>" style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;"></div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="5">No funnels found. Create one from a template below!</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="cce-card" style="margin-top:2rem; border-top: 4px solid var(--cce-primary);">
        <h3>Strategic Funnel Templates</h3>
        <p style="font-size:13px; color:var(--cce-text-light);">Choose a framework based on Russell Brunson's DotCom Secrets and Alex Hormozi's frameworks.</p>

        <div class="cce-grid cce-grid-3" style="margin-top:1.5rem;">
            <div class="cce-modern-card" style="border-top: 3px solid #0073aa;">
                <h4 style="margin-top:0;">🧲 Lead Magnet</h4>
                <p style="font-size:11px; color: var(--cce-text-light); margin-bottom: 1rem;">Exchange value for contact info to build your list. <strong>Best for:</strong> Building an audience fast.</p>
                <ul class="cce-step-list" style="margin-bottom: 1rem;">
                    <li>Opt-in Page</li>
                    <li>Thank You / Delivery</li>
                </ul>
                <button class="button button-primary cce-use-template" data-template="lead_magnet" style="width:100%; border-radius: var(--cce-radius);">Deploy</button>
            </div>

            <div class="cce-modern-card" style="border-top: 3px solid #ffb700;">
                <h4 style="margin-top:0;">📅 Consultation</h4>
                <p style="font-size:11px; color: var(--cce-text-light); margin-bottom: 1rem;">The "Gold Standard" for high-ticket coaching sales. <strong>Best for:</strong> $3k+ service programs.</p>
                <ul class="cce-step-list" style="margin-bottom: 1rem;">
                    <li>Application Form</li>
                    <li>Calendar Booking</li>
                    <li>Confirmation Page</li>
                </ul>
                <button class="button button-primary cce-use-template" data-template="consultation" style="width:100%; border-radius: var(--cce-radius);">Deploy</button>
            </div>

            <div class="cce-modern-card" style="border-top: 3px solid #d63638;">
                <h4 style="margin-top:0;">🚀 Appointment Machine</h4>
                <p style="font-size:11px; color: var(--cce-text-light); margin-bottom: 1rem;">A high-volume system for teams with setters. <strong>Best for:</strong> Scaling sales teams.</p>
                <ul class="cce-step-list" style="margin-bottom: 1rem;">
                    <li>Qualifier Form</li>
                    <li>Setter Triage</li>
                    <li>Closer Strategy Call</li>
                </ul>
                <button class="button button-primary cce-use-template" data-template="appointment_machine" style="width:100%; border-radius: var(--cce-radius);">Deploy</button>
            </div>

            <div class="cce-modern-card" style="border-top: 3px solid #22c55e;">
                <h4 style="margin-top:0;">🧬 Hybrid Closer</h4>
                <p style="font-size:11px; color: var(--cce-text-light); margin-bottom: 1rem;">Combines education with immediate action. <strong>Best for:</strong> Transitioning from low to high ticket.</p>
                <ul class="cce-step-list" style="margin-bottom: 1rem;">
                    <li>Opt-in → VSL</li>
                    <li>Calendar → Checkout</li>
                </ul>
                <button class="button button-primary cce-use-template" data-template="hybrid_closer" style="width:100%; border-radius: var(--cce-radius);">Deploy</button>
            </div>

            <div class="cce-modern-card" style="border-top: 3px solid #673ab7;">
                <h4 style="margin-top:0;">🎥 Webinar</h4>
                <p style="font-size:11px; color: var(--cce-text-light); margin-bottom: 1rem;">Automated selling at scale. <strong>Best for:</strong> Group coaching and masterminds.</p>
                <ul class="cce-step-list" style="margin-bottom: 1rem;">
                    <li>Registration Page</li>
                    <li>Live/Evergreen VSL</li>
                    <li>Direct Checkout</li>
                </ul>
                <button class="button button-primary cce-use-template" data-template="webinar" style="width:100%; border-radius: var(--cce-radius);">Deploy</button>
            </div>

            <div class="cce-modern-card" style="border-top: 3px solid #ef4444;">
                <h4 style="margin-top:0;">💎 High-Ticket VSL</h4>
                <p style="font-size:11px; color: var(--cce-text-light); margin-bottom: 1rem;">Direct persuasion for high-ticket offers. <strong>Best for:</strong> Cold traffic to call conversion.</p>
                <ul class="cce-step-list" style="margin-bottom: 1rem;">
                    <li>Opt-in Page</li>
                    <li>Video Sales Letter</li>
                    <li>Booking Session</li>
                </ul>
                <button class="button button-primary cce-use-template" data-template="vsl" style="width:100%; border-radius: var(--cce-radius);">Deploy</button>
            </div>

            <div class="cce-modern-card" style="border-top: 3px solid #f97316;">
                <h4 style="margin-top:0;">🎣 Tripwire</h4>
                <p style="font-size:11px; color: var(--cce-text-light); margin-bottom: 1rem;">Convert strangers into buyers with a low-cost offer. <strong>Best for:</strong> Liquidating ad spend.</p>
                <ul class="cce-step-list" style="margin-bottom: 1rem;">
                    <li>Sales Page</li>
                    <li>Order Form</li>
                    <li>One-Click Upsell</li>
                </ul>
                <button class="button button-primary cce-use-template" data-template="tripwire" style="width:100%; border-radius: var(--cce-radius);">Deploy</button>
            </div>
        </div>
    </div>

    <div class="cce-guide-box" style="margin-top: 2rem;">
        <h4><span class="dashicons dashicons-yes"></span> Pre-Launch Success Checklist</h4>
        <ul class="cce-step-list">
            <li><strong>Mobile Audit:</strong> Check every step on your phone. 80% of traffic is mobile.</li>
            <li><strong>Tracking:</strong> Ensure your tracking pixels are firing on the 'Thank You' step.</li>
            <li><strong>CRM Connection:</strong> Verify that a test opt-in creates a lead in the "New" CRM column.</li>
            <li><strong>Automation:</strong> Confirm that the "Lead Captured" trigger is active for this funnel.</li>
        </ul>
    </div>

    <!-- Add Step Modal -->
    <div id="cce-add-step-modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
        <div style="background:#fff; margin:10% auto; padding:25px; width:400px; border-radius:12px; position:relative;">
            <span class="cce-modal-close" style="position:absolute; right:20px; top:15px; cursor:pointer; font-size:24px;">&times;</span>
            <h2>Add Funnel Step</h2>
            <form id="cce-add-step-form">
                <input type="hidden" id="add-step-funnel-id">
                <p><label>Step Title</label><br><input type="text" id="add-step-title" class="widefat" required></p>
                <p><label>Step Type</label><br>
                    <select id="add-step-type" class="widefat">
                        <option value="optin">Opt-in Form</option>
                        <option value="booking">Booking/Scheduling</option>
                        <option value="checkout">Checkout/Payment</option>
                        <option value="thank_you">Thank You Page</option>
                    </select>
                </p>
                <button type="submit" class="button button-primary">Add Step</button>
            </form>
        </div>
    </div>

    <!-- Step Config Modal -->
    <div id="cce-step-config-modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
        <div style="background:#fff; margin:10% auto; padding:25px; width:400px; border-radius:12px; position:relative;">
            <span class="cce-modal-close" style="position:absolute; right:20px; top:15px; cursor:pointer; font-size:24px;">&times;</span>
            <h2>Configure Step</h2>
            <form id="cce-step-config-form">
                <input type="hidden" id="config-funnel-id">
                <input type="hidden" id="config-step-idx">

                <div id="config-offer-selector" style="display:none;">
                    <p><label>Link to Offer</label><br>
                    <select id="config-offer-id" class="widefat">
                        <option value="">Select Offer...</option>
                        <?php foreach($offers as $o) echo "<option value='{$o->id}'>{$o->title}</option>"; ?>
                    </select></p>
                </div>

                <div id="config-thankyou-selector" style="display:none;">
                    <p><label>Custom Success Message</label><br>
                    <textarea id="config-success-message" class="widefat" rows="3"></textarea></p>
                    <p><label>OR Redirect URL</label><br>
                    <input type="url" id="config-redirect-url" class="widefat" placeholder="https://..."></p>
                </div>

                <button type="submit" class="button button-primary">Save Config</button>
            </form>
        </div>
    </div>
</div>
