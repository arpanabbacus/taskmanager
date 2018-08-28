# taskmanager
Task Management Module


### Step 1. Create a directory for the module like above format.

In this module, we will use `Magemonkeys` for Vendor name and `Taskmanager` for ModuleName. So we need to make this folder:
`app/code/Magemonkeys/Taskmanager`

### Step 2. Run Foloowing Command to install this extension

~~~~~~~~~
php bin/magento setup:upgrade
php bin/magento cache:clean
php bin/magento cache:flush
~~~~~~~~~

### Step 3. Check in admin

~~~~~~~~~
You can see the menu in admin `Magemonkeys->Tasks`. You see the listing and `Add New Task` Button there to add new task.
~~~~~~~~~
