php app/console doctrine:database:drop --force;
php app/console doctrine:database:create;
mysql -u root flanders_drive < flanders_drive.sql;
./synchronize-solr.sh;
