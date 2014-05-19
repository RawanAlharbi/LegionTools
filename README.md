# LegionTools
LegionTools is a toolkit + UI that provides an easy way to recruit and route workers from Amazon Mechanical Turk to real-time and synchronous tasks.

LegionTools provides three key features for requesters:

* **Optimized automatic HIT posting** - LegionTools makes it easy to automatically post HITs to AMT. To ensure your HITs are seen by workers, LegionTools uses an optimized algorithm to post and expire a steady stream of HITs. Additionally, you can easily change HIT title, price, and other values on the fly. These changes are reflected in subsequent posted HITs.
* **Worker staging** - LegionTools allows you to pool workers prior to forwarding them to a task that require many workers to all begin at the same time. LegionTools lets you select the number of workers you need, then send them all to a single URL at the same time with the push of a button. 
* **Completed-HIT management** - LegionTools allows you to easily approve, reject, and dispose all the HITs that workers have completed.

# Getting Started
## Installation
1. Clone LegionTools to a public web server with PHP 5.1.2 or higher.
2. Install PHP’s SOAP extension, if not already installed. Odds are, if you’re running PHP on Mac OS or Windows, the extension’s already installed.
	* CentOS/RedHat: `yum install php-soap`
	* Debian/Ubuntu: `apt-get install php5-soap`
3. Modify `LegionTools/baseURL.php` to contain the public URL of your LegionTools installation.
4. Add your Amazon Mechanical Turk keys in `LegionTools/amtKeys.php`
5. Ensure that `LegionTools/db` and its contents has permissions `777`.

## Usage
* Modify `isSandbox.php` to determine whether you post HITs on the sandbox.
* Navigate to `LegionTools/Retainer/trigger.php` in your browser (confirmed to work with the latest version of Chrome) to pull up the control UI.
* Add a new task by typing a title, description, keywords, and unique session name and clicking `Add new task`.
* Click `Start recruiting` to beging recruiting. **You must click `Stop recruiting` to end the recruiting process**.
* Pull up a previous task using just your task session name. If you closed the UI page and left the recruiting tool running, you may stop that recruiting process by loading the associated session and clicking `Stop recruiting`.
* Modify task title, description, and keywords with `Update task via task session`.
* Send workers to a URL with the Fire button. **Your chosen URL must be `HTTPS`**. 
* When you are ready to review HITs, click `Reload` in the `Overview` section to load all reviewable HITs associated with a given task session.
* Modify `LegionTools/Retainer/instructions.php` to change what workers will see while they are being staged.

# Authors
* [Mitchell Gordon](http://mgordon.me/ "Mitchell Gordon")
* [Walter S. Lasecki](http://wslasecki.com/ "Walter S. Lasecki")
