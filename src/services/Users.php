<?php
/**
 * Seeder plugin for Craft CMS 3.x
 *
 * Users seeder for Craft CMS
 *
 * @link      https://studioespresso.co
 * @copyright Copyright (c) 2018 Studio Espresso
 */

namespace studioespresso\seeder\services;

use craft\elements\Asset;
use craft\elements\Category;
use craft\elements\Entry;
use craft\elements\User;
use craft\errors\FieldNotFoundException;
use Faker\Factory;
use Faker\Provider\Person;
use studioespresso\seeder\records\SeederAssetRecord;
use studioespresso\seeder\records\SeederEntryRecord;
use studioespresso\seeder\records\SeederUserRecord;
use studioespresso\seeder\Seeder;

use Craft;
use craft\base\Component;
use yii\base\Model;

/**
 * Users Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Studio Espresso
 * @package   Seeder
 * @since     1.0.0
 */
class Users extends Component {
	/**
	 * @param null $sectionId
	 *
	 * @throws \Throwable
	 * @throws \craft\errors\ElementNotFoundException
	 * @throws \yii\base\Exception
	 * @throws \yii\base\InvalidConfigException
	 */
	public function generate( $groupId = null, $count ) {
		$faker = Factory::create();
		$userGroup = Craft::$app->userGroups->getGroupById($groupId);
		if(!$userGroup) {
		    echo "Usergroup not found";
		    exit();
        }
		for ( $x = 1; $x <= $count; $x ++ ) {
		    $user = new User();
		    $user->passwordResetRequired = true;
		    $user->email = $faker->email;
		    $user->username = $user->email;
		    $user->firstName = $faker->firstName;
		    $user->lastName = $faker->lastName;
		    Craft::$app->elements->saveElement($user);
		    $this->saveSeededUser($user);
		    Craft::$app->users->assignUserToGroups($user->id, [$userGroup->id]);
		}

	}

    /**
     * @param User $user
     */
    public function saveSeededUser($user) {
        $record = new SeederUserRecord();
        $record->userUid = $user->uid;
        $record->save();
    }
}