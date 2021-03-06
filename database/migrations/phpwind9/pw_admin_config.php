<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PwAdminConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*

            // 原始 pw9 sql:

            DROP TABLE IF EXISTS `pw_admin_config`;
            CREATE TABLE `pw_admin_config` (
              `name` varchar(30) NOT NULL COMMENT '配置名称',
              `namespace` varchar(15) NOT NULL COMMENT '配置命名空间',
              `value` text COMMENT '缓存值',
              `vtype` enum('string','array','object') NULL DEFAULT 'string' COMMENT '配置值类型',
              `description` text COMMENT '配置介绍',
              PRIMARY KEY (`namespace`,`name`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站配置表';

         */
        Schema::create('pw_admin_config', function (Blueprint $table) {
            if (env('DB_CONNECTION', false) === 'mysql') {
                $table->engine = 'InnoDB';
            }

            $table->string('name', 30)->comment('配置名称');
            $table->string('namespace', 15)->comment('配置命名空间');
            $table->text('value')->comment('缓存值');
            $table->enum('vtype', ['string', 'array', 'object'])->nullable()->default('string')->comment('配置值类型');
            $table->primary(['namespace', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pw_admin_config');
    }
}
