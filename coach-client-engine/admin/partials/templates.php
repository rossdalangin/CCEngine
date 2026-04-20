<div class="wrap cce-admin-wrap">
    <h1>Strategic Template Library</h1>
    <p class="description">Access pre-built frameworks based on high-performance coaching models. You can edit these templates to match your brand and offer.</p>

    <div class="cce-card" style="margin-bottom: 2rem; border-top: 4px solid var(--cce-primary);">
        <h3>💎 Masterpiece Strategy Vault</h3>
        <p class="description">Deploy full, cross-linked business frameworks based on industry titans. These frameworks automatically create your Funnels, Offers, and Automation rules.</p>

        <div class="cce-grid cce-grid-3" style="margin-top:1.5rem;">
            <!-- Hormozi Strategy -->
            <div class="cce-modern-card">
                <div class="cce-badge cce-badge-accent" style="margin-bottom:10px;">TITAN FRAMEWORK</div>
                <h4 style="margin:0 0 10px 0; font-size: 1.1rem; font-weight: 700;">The Hormozi Launch</h4>
                <p style="font-size:13px; color:var(--cce-text-light); line-height: 1.5;">Built for "Offers so good they feel stupid saying no." Includes VSL Funnel + High-Ticket Offer + Value Ascension Emails.</p>
                <button type="button" class="button button-primary cce-deploy-strategy" data-strategy="hormozi" style="width:100%; margin-top:15px; border-radius: var(--cce-radius);">Deploy Full Strategy</button>
            </div>

            <!-- Brunson Strategy -->
            <div class="cce-modern-card">
                <div class="cce-badge cce-badge-secondary" style="margin-bottom:10px;">TITAN FRAMEWORK</div>
                <h4 style="margin:0 0 10px 0; font-size: 1.1rem; font-weight: 700;">The Brunson Webinar</h4>
                <p style="font-size:13px; color:var(--cce-text-light); line-height: 1.5;">The perfect webinar framework for group scaling. Includes Webinar Funnel + Order Bump Offer + Indoctrination Sequence.</p>
                <button type="button" class="button button-primary cce-deploy-strategy" data-strategy="brunson" style="width:100%; margin-top:15px; border-radius: var(--cce-radius);">Deploy Full Strategy</button>
            </div>

            <!-- Custom Business Models -->
            <div class="cce-modern-card">
                <div class="cce-badge cce-badge-neutral" style="margin-bottom:10px;">MODEL DEPLOYMENT</div>
                <h4 style="margin:0 0 10px 0; font-size: 1.1rem; font-weight: 700;">Agency Builder</h4>
                <p style="font-size:13px; color:var(--cce-text-light); line-height: 1.5;">For DFY services. Populates the Engine with Lead Gen funnels and cold outreach automation templates.</p>
                <button type="button" class="button button-secondary cce-deploy-model" data-model="agency" style="width:100%; margin-top:15px; border-radius: var(--cce-radius);">Deploy Agency Model</button>
            </div>
        </div>
    </div>

    <div class="cce-grid cce-grid-3" style="margin-top:2rem;">

        <!-- Funnel Templates -->
        <div class="cce-card">
            <span class="dashicons dashicons-filter" style="font-size:40px; width:40px; height:40px; color:var(--cce-primary);"></span>
            <h3 style="margin-top: 1rem;">Funnel Templates</h3>
            <p style="color: var(--cce-text-light); font-size: 0.9rem;">Frameworks for VSLs, Webinars, and Challenges.</p>
            <a href="?page=cce-funnels" class="button button-primary" style="border-radius: var(--cce-radius);">Manage Funnels</a>
        </div>

        <!-- Email Templates -->
        <div class="cce-card">
            <span class="dashicons dashicons-email-alt" style="font-size:40px; width:40px; height:40px; color:var(--cce-primary);"></span>
            <h3 style="margin-top: 1rem;">Email Sequences</h3>
            <p style="color: var(--cce-text-light); font-size: 0.9rem;">Pre-written indoctrination and sales sequences.</p>
            <a href="?page=cce-automation#templates" class="button button-primary" style="border-radius: var(--cce-radius);">Edit Sequences</a>
        </div>

        <!-- Offer Templates -->
        <div class="cce-card">
            <span class="dashicons dashicons-awards" style="font-size:40px; width:40px; height:40px; color:var(--cce-accent);"></span>
            <h3 style="margin-top: 1rem;">Grand Slam Offers</h3>
            <p style="color: var(--cce-text-light); font-size: 0.9rem;">Hormozi-style offer structures for maximum value.</p>
            <a href="?page=cce-clients" class="button button-primary" style="border-radius: var(--cce-radius);">View Offers</a>
        </div>
    </div>

    <div class="cce-card" style="margin-top:30px; border-left: 4px solid #d63638;">
        <h3>🧹 Data Maintenance</h3>
        <p>Use this to clear all leads, funnels, and settings for your current user. This is irreversible.</p>
        <button type="button" id="cce-clear-user-data" class="button button-link" style="color:#d63638;">Reset Engine Data</button>
    </div>

    <div class="cce-card" style="margin-top:30px; border-left: 4px solid #00a32a;">
        <h3>🛠 Customization Guide</h3>
        <p>Every template is designed to be 100% editable. To modify a template:</p>
        <ol>
            <li>Navigate to the respective module (Funnels, Automation, or Clients).</li>
            <li>Select the template you want to change.</li>
            <li>Update the content, configuration, or triggers.</li>
            <li>Save your changes to apply them to your live engine.</li>
        </ol>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $('.cce-deploy-strategy').on('click', function() {
        if (!confirm('This will deploy a full cross-linked strategy. Continue?')) return;
        const $btn = $(this);
        const strategy = $btn.data('strategy');
        $btn.prop('disabled', true).text('Building Strategy...');

        cceApi('maintenance/sample-data', 'POST', { model: strategy, linked: true }, function(res) {
            if (res.success) {
                alert('Strategy deployed successfully! All Funnels, Offers, and Emails are now linked.');
                window.location.reload();
            }
        });
    });

    $('.cce-deploy-model').on('click', function() {
        if (!confirm('This will add new sample data to your account. Continue?')) return;

        const $btn = $(this);
        const model = $btn.data('model');
        $btn.prop('disabled', true).text('Deploying...');

        cceApi('maintenance/sample-data', 'POST', { model: model }, function(res) {
            if (res.success) {
                alert(res.message);
                window.location.reload();
            } else {
                $btn.prop('disabled', false).text('Deploy ' + model + ' Model');
            }
        });
    });

    $('#cce-clear-user-data').on('click', function() {
        if (!confirm('Are you absolutely sure you want to clear ALL your data? This cannot be undone.')) return;

        cceApi('maintenance/clear-data', 'POST', {}, function(res) {
            if (res.success) {
                alert(res.message);
                window.location.reload();
            }
        });
    });
});
</script>
