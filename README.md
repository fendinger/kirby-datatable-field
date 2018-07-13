# Kirby DataTables Field

This custom field for [Kirby CMS](https://getkirby.com) displays Kirby's [Structure Field](https://getkirby.com/docs/cheatsheet/panel-fields/structure) as a [DataTable](https://datatables.net/) inside the panel (Kirby's backend).

DataTables from [DataTable](https://datatables.net/).

CSS from [Jon Gacnik](https://github.com/jongacnik/kirby-index-field).

### Blueprint example
```yaml
fields:
...
  datatable:
    label: DataTable
    type: datatable
    fields:
      text:
        label: text
        type: textarea
      picture:
        label: Background Image
        type: image
      text:
        label: Headline Text
        type: text
```

## Filter Data

A custom filter can be applied to the data before it is put out as a json response. This is perfect if you need to modify some of the data for presentation, change columns, etc.

Create a simple plugin `site/plugins/mydatafilters/mydatafilters.php`:
```php
<?php

class MyDataFilters {
  static function myfilterfunc($data) {
    // filter data here
    foreach ($data as $entry) {
      if ($data->{$entry->{'id'}}->{'text'} == '') {
        $data->{$entry->{'id'}}->{'text'} = '- no text -';
      }
    }
    return $data;
  }
}
```

Update field definition:
```yaml
datatable:
  label: DataTable
  type: datatable
  filter: MyDataFilters::myfilterfunc
  fields:
    text:
      label: text
      type: textarea
      ...
```

## Template Usage

You use it similar to Kirby's [Structure Field](https://getkirby.com/docs/cheatsheet/panel-fields/structure).

## Setup

``git clone https://github.com/JensFendinger/kirby-datatable.git site/fields/datatable``
From the root of your kirby install.

Alternatively you can download the zip file, unzip it's contents into site/fields/datatable.

## Known Issues

Some issues related to the structure field of Kirby Panel do also affect the datatable field.

Not all DataTables functions are implemented already. But it's a good starting point.
