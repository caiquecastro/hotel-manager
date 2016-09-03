@servers(['web' => 'dengue-deploy'])

<?php
$repo = 'git@github.com:caiquecastro/hotel-manager.git';
$release_dir = '/var/www/HotelManager/releases';
$app_dir = '/var/www/HotelManager/current';
$release = 'release_' . date('YmdHis');
?>

@macro('deploy', ['on' => 'web'])
    fetch_repo
    run_composer
    update_permissions
    update_symlinks
@endmacro

@task('fetch_repo')
    echo 'Fetching repository';
    [ -d {{ $release_dir }} ] || mkdir -p {{ $release_dir }};
    cd {{ $release_dir }};
    git clone {{ $repo }} {{ $release }}
@endtask

@task('run_composer')
    echo 'Running composer';
    cd {{ $release_dir }}/{{ $release }};
    composer install --prefer-dist;
    php artisan key:generate;
    npm install;
    gulp;
@endtask

@task('update_permissions')
    echo 'Updating permissions';
    cd {{ $release_dir }};
    sudo chown -R ubuntu:www-data {{ $release }};
    sudo chmod -R ug+rwx {{ $release }};
@endtask

@task('update_symlinks')
    echo 'Updating symlinks';
    ln -nfs {{ $release_dir }}/{{ $release }} {{ $app_dir }}
    sudo chown -h ubuntu:www-data {{ $app_dir }};
@endtask
