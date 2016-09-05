<?php namespace App\Http\Controllers\Institutions;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Institution;
use System\DatatableController;
use System\Grids;

class InstitutionsController extends DatatableController
{
    protected $layout = '~layouts.template.layout';

    public function index($type = NULL, $edit = NULL){

        $config = Grids::make('institutions')->toIndexConfig('institutions');
        $config['row-source'] .= $type ? '/'.$type  : '';
        $config['breadcrumbs'] = [
            [
                'name'   => 'Instituții',
                'route'  => 'institutions_index',
                'ids'    => ['type' => $type]
            ],
            [
                'name'      => $config['caption'] .= Institution::categories()[$type],
                'route'     => "institutions_index",
                'ids'       => ['type' => $type]
            ]
        ];

        return $this->show( $config + ['other-info' => ['category_id' => $type]] );
    }

    public function rows($id, $type = NULL){
        $organization_id = \Session::get('user_organization');
        $config = Grids::make($id)->toRowDatasetConfig($id);
        $filters = $config['source']->custom_filters();
        $type_organization = $organization_id ? ['organization_id' => 'institutions.organization_id = '.$organization_id] : [];
        $type_client = $type ? ['tip_client' => 'institutions.category_id = '.$type] : [];

        $allowed_organizations = $this->getUserOrganizationsIds();
        $user_organizations = $type ? ['user_organizations' => 'institutions.organization_id in '.$allowed_organizations] : [];

        $config['source']->custom_filters( $filters + $type_client + $type_organization  + $user_organizations);
        return $this->dataset( $config );
    }

    public function getUserOrganizationsIds()
    {
        $organizations = access()->user()->organizations()->get();
        $ids = '(';

        foreach($organizations as $organization){
            $ids .= $organization->id .',';
        }

        $ids = trim($ids, ',');
        $ids .= ')';

        return $ids;
    }
} 