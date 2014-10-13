Flanders Drive (Li-SAFE)
========================

This README contains relevant information regarding the team and project status for Flanders Drive.

1. Team
-------

The contact details for the Cegeka team can be found below:

| Name          | Role               | Email                   | Phone           |
|---------------|--------------------|-------------------------|-----------------|
| Eric Pieters  | Project Manager    | eric.pieters@cegeka.be  | +32-474.107.887 |
| Petre Pătraşc | Lead Developer     | petre.patrasc@cegeka.be | +40-741.251.639 |
| Jan Oris      | Support Developer  | jan.oris@cegeka.be      | +32-496.942.057 |

Please note that all of the members above can also be reached on Lync via their email address.

2. Environment Information
--------------------------

The environment stack used during development is as follows:

| Software           | Version                |
|--------------------|-----------------------:|
| Ubuntu OS          | 14.04                  |
| PHP                | 5.5.9-1ubuntu4         |
| Apache             | 2.4.7                  |
| MySQL              | 5.5.37                 |
| Composer           | 2014-05-27             |

In order to build our development machines, we've used a [Puppet build](https://github.com/petrepatrasc/php-standard-edition-box/tree/php-solr).

The staging server is accessible via a [Heroku dyno](http://flanders-drive.herokuapp.com/).