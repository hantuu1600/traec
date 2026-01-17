<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'rows' => [],
  'filterName' => 'filter',
  'queryName'  => 'q',

  // opsional
  'title' => 'Lecturers',
  'addUrl' => '#',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
  'rows' => [],
  'filterName' => 'filter',
  'queryName'  => 'q',

  // opsional
  'title' => 'Lecturers',
  'addUrl' => '#',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
  $q = trim((string) request($queryName, ''));
  $filter = (string) request($filterName, 'all');

  // helper filter
  $contains = function ($haystack, $needle) {
      return $needle === '' || str_contains(mb_strtolower((string)$haystack), mb_strtolower((string)$needle));
  };

  // filter rows
  $filtered = array_values(array_filter($rows, function ($r) use ($q, $filter, $contains) {
      $role = strtoupper($r['role'] ?? 'LECTURER');

      if ($role !== 'LECTURER') return false;

      $name  = $r['name'] ?? '';
      $nidn  = $r['nidn'] ?? '';
      $email = $r['email'] ?? '';
      $prodi = $r['study_program'] ?? '';

      $matchQuery = $contains($name, $q) || $contains($nidn, $q) || $contains($email, $q);
      $matchFilter = ($filter === 'all') || (mb_strtolower($prodi) === mb_strtolower($filter));

      return $matchQuery && $matchFilter;
  }));
?>

<div class="mx-auto max-w-fit">
  <div class="rounded-2xl border border-base-300 bg-base-100 shadow-sm">
    
    <div class="flex items-start justify-between gap-4 p-6">
      <div>
        <h2 class="text-lg font-semibold text-secondary"><?php echo e($title); ?></h2>
      </div>

      <a href="<?php echo e($addUrl); ?>"
         class="btn btn-sm rounded-full bg-primary text-white hover:bg-primary/90 border-0">
        + Add Lecturer
      </a>
    </div>

    
    <div class="px-6 pb-6">
      <div class="overflow-x-auto">
        <table class="table">
          <thead>
            <tr class="text-base-content/60">
              <th class="w-36">NIDN</th>
              <th>Name</th>
              <th class="w-44">Study Program</th>
              <th class="w-64">Email</th>
              <th class="w-36">Updated</th>
              <th class="w-40 text-right">Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $filtered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <?php
                $id   = $row['id'] ?? null;
                $nidn = $row['nidn'] ?? '-';
                $name = $row['name'] ?? '-';
                $email = $row['email'] ?? '-';
                $prodi = $row['study_program'] ?? '-';
                $faculty = $row['faculty'] ?? null;

                $updated = $row['updated_at'] ?? ($row['updated'] ?? '-');

                // URL fallbacks
                $viewUrl = $row['view_url'] ?? '#';
                $editUrl = $row['edit_url'] ?? '#';
              ?>

              <tr class="hover:bg-base-200/40">
                <td class="font-medium"><?php echo e($nidn); ?></td>

                <td>
                  <div class="font-semibold text-secondary"><?php echo e($name); ?></div>
                  <?php if($faculty): ?>
                    <div class="text-xs text-base-content/60"><?php echo e($faculty); ?></div>
                  <?php endif; ?>
                </td>

                <td class="text-base-content/80"><?php echo e($prodi); ?></td>

                <td class="text-base-content/80"><?php echo e($email); ?></td>

                <td class="text-base-content/70">
                  <?php echo e(is_string($updated) ? $updated : '-'); ?>

                </td>

                <td class="text-right">
                  <div class="inline-flex items-center gap-2">
                    <a href="<?php echo e($viewUrl); ?>" class="btn btn-ghost btn-sm rounded-full">View</a>
                    <a href="<?php echo e($editUrl); ?>" class="btn btn-ghost btn-sm rounded-full">Edit</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                <td colspan="7" class="py-10 text-center text-base-content/60">
                  No lecturers found.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <div class="mt-4 text-sm text-base-content/60">
        Showing <?php echo e(count($filtered)); ?> lecturers
        <?php if($q !== '' || $filter !== 'all'): ?>
          <span class="ml-2">
            (filtered)
          </span>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php /**PATH D:\traec\resources\views/components/table-lecturers.blade.php ENDPATH**/ ?>