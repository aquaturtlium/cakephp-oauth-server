<?php

/** @noinspection AutoloadingIssuesInspection */

use Migrations\AbstractMigration;

class UpgradeAccessTokenScopes extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('oauth_access_token_scopes');
        $table->changeColumn('oauth_token', 'string', [
            'default' => null,
            'limit' => 80,
            'null' => false,
        ]);
        $table->update();

        $table = $this->table('oauth_auth_code_scopes');
        $table->changeColumn('auth_code', 'string', [
            'default' => null,
            'limit' => 80,
            'null' => false,
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('oauth_access_token_scopes');
        $table->changeColumn('oauth_token', 'string', [
            'default' => null,
            'limit' => 40,
            'null' => false,
        ]);
        $table->update();

        $table = $this->table('oauth_auth_code_scopes');
        $table->changeColumn('auth_code', 'string', [
            'default' => null,
            'limit' => 40,
            'null' => false,
        ]);
        $table->update();
    }
}
