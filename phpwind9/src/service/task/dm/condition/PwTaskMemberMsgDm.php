<?php

/**
 * 完成条件扩展实现--会员信息类之发送消息.
 *
 * @author xiaoxia.xu <xiaoxia.xuxx@aliyun-inc.com>
 * @copyright ©2003-2103 phpwind.com
 * @license http://www.windframework.com
 *
 * @version $Id: PwTaskMemberMsgDm.php 15745 2012-08-13 02:45:07Z xiaoxia.xuxx $
 */
class PwTaskMemberMsgDm extends PwTaskDm
{
    /* (non-PHPdoc)
     * @see PwTaskDm::filterConditionData()
     */
    protected function filterConditionData()
    {
        if (! isset($this->_data['conditions'])) {
            return true;
        }
        $condition = $this->_data['conditions'];
        if (! $condition || ! is_array($condition)) {
            return new PwError('TASK:condition.require');
        }

        if (! $condition['name']) {
            return new PwError('TASK:condition.msg.name.require');
        }
        $url = $condition['url'];
        unset($condition['url']);
        $this->_data['conditions']['url'] = $this->getReplace($condition, $url);
        $this->_data['conditions'] = serialize($this->_data['conditions']);

        return true;
    }
}
