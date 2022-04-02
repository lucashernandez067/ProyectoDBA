<?php

class Helpers {
    public static function message($message, $type, $icon = false) {
        $longitud = strlen($message);
        $margin = $longitud < 45 ? 'py-3' : '';
        if ($icon) {                 
            ?>
            <div class="alert alert-dismissible fade show text-light bg-<?= $type; ?>" role="alert">
                <i class="fas <?= $icon; ?>"></i>
                <?= $message; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><b><i class="fas fa-times mb-1 text-light"></i></b></span>
                </button>
            </div>
            <?php
        } else {
            ?>
            <div class="text-center bg-<?= $type; ?> <?= $margin; ?>">
                <span><?= $message; ?></span>
            </div>
            <?php
        }
    }
    public static function alert($message, $icon) {
        if ($message && $icon) {
            ?>
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '<?= $icon; ?>',
                    title: '<?= $message; ?>',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
            <?php
        }
    }
}

?>