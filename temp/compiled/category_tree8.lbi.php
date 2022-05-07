<div class="catselect" style=" width:90px;float:left;margin-left:5px;">
<select id="pid2" onchange="gradeChange()">
<option value="">Category</option>
 <?php $_from = $this->_var['categories1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['cat']['iteration']++;
?>
<option grade="<?php echo $this->_var['cat']['url']; ?>" value="<?php echo $this->_var['cat']['url']; ?>" <?php if ($this->_var['cat']['id'] == $this->_var['category']): ?>selected<?php endif; ?>><?php echo htmlspecialchars($this->_var['cat']['name']); ?></option>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</select>
</div>