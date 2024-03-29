@servers(['staging' => 'root@10.10.109.196','dev' => '127.0.0.1'])

@task('lists', ['on' => 'staging'])
cd /var/www/
ls -la
@endtask

@task('lists-local', ['on' => 'dev'])
ls -la
@endtask

@story('project')
mkdir
git
composer
movie
inZip
tmpweb
scpZip
unZip
migrate
remove
remove3
done
@endstory

@task('mkdir', ['on' => 'dev'])
mkdir trainee-mfilimonov
@endtask

@task('git', ['on' => 'dev'])
git clone https://git.smartru.com/mfilimonov/web.git ./trainee-mfilimonov
@endtask

@task('composer', ['on' => 'dev'])
cd /var/www/trainee-mfilimonov
composer install
@endtask

@task('movie', ['on' => 'dev'])
cd trainee-mfilimonov
mv .env.staging .env
@endtask

@task('inZip', ['on' => 'dev'])
cd /var/www/
tar -cf zip_folder.tar ./trainee-mfilimonov/ --exclude-ignore=.tarignore --exclude "./trainee-mfilimonov/zip_folder.tar"
@endtask

@task('tmpweb', ['on' => 'staging'])
cd /var/www
mkdir -v /var/www/trainee-mfilimonov
@endtask

@task('scpZip', ['on' => 'dev'])
scp /var/www/zip_folder.tar root@10.10.109.196:/var/www/
echo scp!
@endtask

@task('unZip', ['on' => 'staging'])
cd /var/www/
tar -xf zip_folder.tar
echo unzip!
@endtask

@task('migrate', ['on' => 'staging'])
cd /var/www/trainee-mfilimonov
php artisan migrate
@endtask

@task('link', ['on' => 'staging'])

@endtask

@task('remove', ['on' => 'dev'])
rm -rf trainee-mfilimonov zip_folder.tar
@endtask

@task('remove2', ['on' => 'staging'])
cd /var/www
rm -rf tasks-mfilimonov zip_folder.tar
@endtask

@task('remove3', ['on' => 'staging'])
cd /var/www
rm -rf zip_folder.tar
@endtask

@task('done', ['on' => 'dev'])
echo done!
@endtask




