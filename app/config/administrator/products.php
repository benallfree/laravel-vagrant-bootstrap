<?php

return array(

	'title' => 'Products',

	'single' => 'Product',

	'model' => 'Product',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
    'title' => array(
      'title' => 'Title',
    ),
    'store_url' => [
      'title'=>'Store URL',
      'output'=>function($value)
      {
        if($value==null || $value=='') return '';
        return "<a href='{$value}'>Store URL</a>";
      },
    ],
    'amazon_url'=> [
      'title'=>'Amazon URL',
      'output'=>function($value)
      {
        return "<a href='{$value}'>Amazon URL</a>";
      },
    ],
    'asin'=> [
      'title'=>'ASIN',
    ],
    'Amazon Category'=> [
      'title'=>'Amazon Category',
    ],
    'amazon_rank'=> [
      'title'=>'Amazon Rank',
      'output'=>function($value)
      {
        if($value==null || $value=='') return '';
        return number_format($value);
      },
    ],
    'store_price'=> [
      'title'=>'Store Price',
      'output'=>function($value)
      {
        if($value==null || $value=='') return '';
        setlocale(LC_MONETARY, 'en_US');
        return money_format('%(n', $value);
      }
    ],
    'amazon_price'=> [
      'title'=>'Amazon Price',
      'output'=>function($value)
      {
        if($value==null || $value=='') return '';
        setlocale(LC_MONETARY, 'en_US');
        return money_format('%(n', $value);
      }
    ],
    'shipping_cost'=> [
      'title'=>'Shipping Cost',
      'output'=>function($value)
      {
        if($value==null || $value=='') return '';
        setlocale(LC_MONETARY, 'en_US');
        return money_format('%(n', $value);
      }
    ],
    'expected_ship_days' => [
      'title'=>'Expected Shipping Time',
    ],
    'created_at'=>[
      'title'=>'Created',
      'output'=>function($value)
      {
        if($value==null || $value=='') return '';
        return \Carbon\Carbon::createFromTimeStamp($value)->diffForHumans();
      },
    ],
    'updated_at'=>[
      'title'=>'Updated',
      'output'=>function($value)
      {
        if($value==null || $value=='') return '';
        return \Carbon\Carbon::createFromTimeStamp($value)->diffForHumans();
      },
    ],
    'listed_at'=>[
      'title'=>'Listed',
      'output'=>function($value)
      {
        if($value==null || $value=='') return '';
        return \Carbon\Carbon::createFromTimeStamp($value)->diffForHumans();
      },
    ],    
    'found'=>[
      'title'=>'Found',
      'output'=>function($value)
      {
        if($value==null || $value=='') return '';
        return \Carbon\Carbon::createFromTimeStamp($value)->diffForHumans();
      },
    ],    
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id' => array(
		  'title'=>'ID',
		),
    'title' => array(
      'title' => 'Title',
    ),
    'store_url'=>[
      'title'=>'Store URL',
    ],
    'store_price' => [
      'title'=>'Store Price',
      'type'=>'number',
      'symbol'=>'$',
    ],
    'shipping_cost' => [
      'title'=>'Shipping Cost',
      'type'=>'number',
      'symbol'=>'$',
    ],
    'expected_ship_days' => [
      'title'=>'Expected Shipping Time (days)',
      'type'=>'number',
    ],
    'amazon_url'=> [
      'title'=>'Amazon URL',
    ],
    'asin'=> [
      'title'=>'ASIN',
    ],
    'amazon_price' => [
      'title'=>'Amazon Price',
      'type'=>'number',
      'symbol'=>'$',
    ],
    'amazon_rank' => [
      'title'=>'Amazon Rank',
      'type'=>'number',
    ],
    'amazon_category' => [
      'title'=>'Amazon Category',
    ],
    'created_at'=> [
      'type' => 'datetime',
      'title' => 'Date Created',
      'date_format' => 'yy-mm-dd', //optional, will default to this value
      'time_format' => 'HH:mm',    //optional, will default to this value
    ],
    'found_at'=> [
      'type' => 'datetime',
      'title' => 'Date Found',
      'date_format' => 'yy-mm-dd', //optional, will default to this value
      'time_format' => 'HH:mm',    //optional, will default to this value
    ],
    'listed_at'=> [
      'type' => 'datetime',
      'title' => 'Date Listed',
      'date_format' => 'yy-mm-dd', //optional, will default to this value
      'time_format' => 'HH:mm',    //optional, will default to this value
    ],
    'updated_at'=> [
      'type' => 'datetime',
      'title' => 'Date Updated',
      'date_format' => 'yy-mm-dd', //optional, will default to this value
      'time_format' => 'HH:mm',    //optional, will default to this value
    ],
    
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
    'title' => array(
      'title' => 'Title',
    ),
    'store_url'=>[
      'title'=>'Store URL',
    ],
    'store_price' => [
      'title'=>'Store Price',
      'type'=>'number',
      'symbol'=>'$',
    ],
    'description' => [
      'title'=>'Description',
      'type'=>'textarea',
    ],
    'shipping_cost' => [
      'title'=>'Shipping Cost',
      'type'=>'number',
      'symbol'=>'$',
    ],
    'expected_ship_days' => [
      'title'=>'Expected Shipping Time (days)',
      'type'=>'number',
    ],
    'amazon_url'=> [
      'title'=>'Amazon URL',
    ],
    'amazon_price' => [
      'title'=>'Amazon Price',
      'type'=>'number',
      'symbol'=>'$',
    ],
    'amazon_rank' => [
      'title'=>'Amazon Rank',
      'type'=>'number',
    ],
    'asin'=> [
      'title'=>'ASIN',
    ],
    'amazon_category' => [
      'title'=>'Amazon Category',
    ],
    'created_at'=> [
      'type' => 'datetime',
      'title' => 'Date Created',
      'date_format' => 'yy-mm-dd', //optional, will default to this value
      'time_format' => 'HH:mm',    //optional, will default to this value
    ],
    'found_at'=> [
      'type' => 'datetime',
      'title' => 'Date Found',
      'date_format' => 'yy-mm-dd', //optional, will default to this value
      'time_format' => 'HH:mm',    //optional, will default to this value
    ],
    'listed_at'=> [
      'type' => 'datetime',
      'title' => 'Date Listed',
      'date_format' => 'yy-mm-dd', //optional, will default to this value
      'time_format' => 'HH:mm',    //optional, will default to this value
    ],
    'updated_at'=> [
      'type' => 'datetime',
      'title' => 'Date Updated',
      'date_format' => 'yy-mm-dd', //optional, will default to this value
      'time_format' => 'HH:mm',    //optional, will default to this value
    ],    
    
	),
  
);