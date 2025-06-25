<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?= $this->include('layouts/head') ?>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <div class="app-wrapper">
    <?= $this->include('layouts/header') ?>
    <?= $this->include('layouts/navbar') ?>

    <main class="app-main">
      <div class="container-fluid px-4">
        <?= $this->renderSection('content') ?>
      </div>
    </main>

    <?= $this->include('layouts/footer') ?>
  </div>
</body>
</html>
