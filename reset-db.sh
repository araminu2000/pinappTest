php app/console doctrine:database:drop --force --env=$1 -q;
php app/console doctrine:database:create --env=$1 -q;
php app/console doctrine:mig:mig -n --env=$1 -q;
php app/console doctrine:fix:load -n --env=$1 -q;
