# Magento invoice print

Override the default Zend PDF invoice print action. This module overrides the controller action to open the invoice in a new tab from which it can be printed or saved. The invoice.phtml template file can be modified to suit the design required.

## Installation

No composer file included. 
Recommended to download the zip file & unzip in <magento_root>/app/code/ folder, which makes it easier to track changes to the template.
Run the standard Magento commands to install the module:

```
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy
```

