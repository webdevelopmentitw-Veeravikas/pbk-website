<?php
/**
 * Multi-step membership registration
 * Styles: public/assets/css/membership.css
 * Script: public/assets/js/membership.js
 */
$siteName = $settings['site_name'] ?? setting('site_name', 'CMS');
?>
<link rel="stylesheet" href="<?= e(asset('assets/css/membership.css')) ?>">

<section class="membership-page">
<div class="wrap">
<div class="membership-card">

<div class="ms-steps" id="msSteps">
  <div class="ms-step active" data-step="1">
    <span class="ms-icon">👤</span>
    <span class="ms-label">முதன்மை தகவல்</span>
  </div>
  <div class="ms-line"></div>
  <div class="ms-step" data-step="2">
    <span class="ms-icon">🧭</span>
    <span class="ms-label">தாயக இருப்பிடத் தகவல்</span>
  </div>
  <div class="ms-line"></div>
  <div class="ms-step" data-step="3">
    <span class="ms-icon">＋</span>
    <span class="ms-label">கூடுதல் தகவல்</span>
  </div>
</div>

<form id="membershipForm" method="post" action="<?= e(url('/membership/register')) ?>" enctype="multipart/form-data" novalidate>
<?= csrf_field() ?>

<!-- STEP 1 -->
<div class="ms-panel active" data-panel="1">
  <div class="ms-grid step1">
    <div class="photo-box">
      <label class="photo-upload" for="photoInput">
        <img id="photoPreview" alt="" hidden>
        <span class="photo-placeholder" id="photoPlaceholder">📷</span>
        <span class="photo-hint">புகைப்படம் (விருப்பம்)</span>
      </label>
      <input type="file" name="photo" id="photoInput" accept="image/*" hidden>
    </div>

    <div class="ms-fields">
      <div class="field">
        <label>பெயர் *</label>
        <input type="text" name="name" required maxlength="150">
      </div>
      <div class="field">
        <label>த/க பெயர் *</label>
        <input type="text" name="father_name" required maxlength="150">
      </div>
      <div class="field">
        <label>பாலினம் *</label>
        <select name="gender" required>
          <option value="">தேர்வு செய்க</option>
          <option value="ஆண்">ஆண்</option>
          <option value="பெண்">பெண்</option>
          <option value="மூன்றாம்பாலினம்">மூன்றாம் பாலினம்</option>
        </select>
      </div>
      <div class="field">
        <label>பிறந்த தேதி *</label>
        <?php
          $maxDob = (new DateTimeImmutable('today'))->modify('-18 years')->format('Y-m-d');
          $minDob = (new DateTimeImmutable('today'))->modify('-120 years')->format('Y-m-d');
        ?>
        <input type="date" name="dob" id="dobInput" required min="<?= e($minDob) ?>" max="<?= e($maxDob) ?>">
        <p class="field-hint">18 வயது நிறைவடைந்தவர்கள் மட்டுமே உறுப்பினராகப் பதிவு செய்யலாம்.</p>
        <p class="field-error" id="dobError" hidden></p>
      </div>
    </div>

    <div class="ms-fields">
      <div class="field">
        <label>வசிக்கும் நாடு *</label>
        <select name="country" required>
          <option value="இந்தியா" selected>இந்தியா</option>
          <option value="மற்றவை">மற்றவை</option>
        </select>
      </div>
      <div class="field">
        <label>தொடர்பு எண் *</label>
        <input type="tel" name="phone" required maxlength="30" placeholder="10 இலக்க எண்">
      </div>
      <div class="field">
        <label>WhatsApp (கட்டாயமல்ல)</label>
        <input type="tel" name="whatsapp" maxlength="30">
      </div>
      <div class="field">
        <label>மின்னஞ்சல் *</label>
        <input type="email" name="email" required maxlength="190">
      </div>
    </div>
  </div>

  <div class="ms-actions">
    <button type="button" class="btn btn-dark ms-next" data-next="2">அடுத்து செல்ல</button>
  </div>
</div>

<!-- STEP 2 -->
<div class="ms-panel" data-panel="2">
  <div class="ms-grid two-col">
    <div class="ms-fields">
      <div class="field">
        <label>மாநிலம் *</label>
        <select name="state" required>
          <option value="தமிழ்நாடு" selected>தமிழ்நாடு</option>
          <option value="புதுச்சேரி">புதுச்சேரி</option>
        </select>
      </div>
      <div class="field">
        <label>மாவட்டம் *</label>
        <select name="district" required>
          <option value="">தேர்வு செய்க</option>
          <?php foreach ($districts as $d): ?>
          <option value="<?= e($d) ?>"><?= e($d) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="field">
        <label>தொகுதி *</label>
        <input type="text" name="constituency" required maxlength="150" placeholder="சட்டமன்றத் தொகுதி">
      </div>
      <div class="field">
        <label>அஞ்சல் குறியீடு *</label>
        <input type="text" name="pincode" required maxlength="20" pattern="[0-9]{6}">
      </div>
    </div>
    <div class="ms-fields">
      <div class="field">
        <label>பகுதி *</label>
        <select name="area_type" required>
          <option value="">தேர்வு செய்க</option>
          <?php foreach ($areaTypes as $t): ?>
          <option value="<?= e($t) ?>"><?= e($t) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="field">
        <label>பகுதி விவரம் *</label>
        <input type="text" name="area_detail" required maxlength="150">
      </div>
      <div class="field">
        <label>முகவரி *</label>
        <textarea name="address" rows="4" required></textarea>
      </div>
    </div>
  </div>

  <div class="ms-actions">
    <button type="button" class="btn btn-danger ms-prev" data-prev="1">முன் செல்ல</button>
    <button type="button" class="btn btn-dark ms-next" data-next="3">அடுத்து செல்ல</button>
  </div>
</div>

<!-- STEP 3 -->
<div class="ms-panel" data-panel="3">
  <div class="ms-grid two-col">
    <div class="ms-fields">
      <div class="field">
        <label>தற்காலிக முகவரி (கட்டாயமல்ல)</label>
        <textarea name="temp_address" rows="4"></textarea>
      </div>
      <div class="field">
        <label>வார்டு (கட்டாயமல்ல)</label>
        <input type="text" name="ward" maxlength="100">
      </div>
    </div>
    <div class="ms-fields">
      <div class="field">
        <label>வாக்காளர் அடையாள அட்டை எண் (கட்டாயமல்ல)</label>
        <input type="text" name="voter_id" maxlength="50">
      </div>
      <div class="field">
        <label>வாக்குச்சாவடி / பூத் எண் (கட்டாயமல்ல)</label>
        <input type="text" name="booth_no" maxlength="50">
      </div>
      <div class="field">
        <label>குருதி விவரம் (கட்டாயமல்ல)</label>
        <select name="blood_group">
          <option value="">தேர்வு செய்க</option>
          <?php foreach ($bloodGroups as $bg): ?>
          <option value="<?= e($bg) ?>"><?= e($bg) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="field">
        <label>கட்சி வளர்ச்சி பங்களிப்பு (கட்டாயமல்ல)</label>
        <select name="contribution">
          <?php foreach ($contributions as $c): ?>
          <option value="<?= e($c) ?>"><?= e($c) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>

  <div class="ms-actions">
    <button type="button" class="btn btn-danger ms-prev" data-prev="2">முன் செல்ல</button>
    <button type="submit" class="btn btn-success" id="msSubmit">பதிவு செய்க</button>
  </div>
</div>

<div class="form-msg" id="msMsg" hidden></div>
</form>
</div>
</div>
</section>

<script src="<?= e(asset('assets/js/membership.js')) ?>" defer></script>
