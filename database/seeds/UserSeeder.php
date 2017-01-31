<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserSeeder.php - Part of the web project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\Seeders;

use App\Models\AbstractModel;
use App\Models\Users\User;

class UserSeeder extends AbstractSeeder {
    /**
     * @inheritDoc
     */
    protected function seed() : array {
        $user = new User("johannes@jitesoft.com");
        $user->setUserLevel(User::USER_LEVEL_ADMIN);
        $user->setActive(true);

        return [
            $user
        ];
    }

    /**
     * @inheritDoc
     */
    protected function exists(AbstractModel $model, Array $models) : bool {
        /** @var User $model */
        return array_first($models, function(User $e) use($model) {
            return mb_strtolower($e->getEmail()) === mb_strtolower($model->getEmail());
        }) !== null ? true : false;
    }


}
