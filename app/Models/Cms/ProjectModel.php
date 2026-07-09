<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cyb_products'; 
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    protected $allowedFields    = [
        'name', 'shortDescription', 'description', 'metaTitle', 'metaKeyword', 
        'metaDescription', 'slug', 'status', 'keyTitle', 'keyDescription', 
        'caseTitle', 'casetDescription', 'industryTitle', 'industryDescription', 
        'thumbnail', 'image', 'hero_banner', 'overviewEyebrow', 'overviewTitle',
        'partnershipSubheading', 'partnershipTitle', 'partnershipDescription'
    ];

    protected $useTimestamps = false;

    /**
     * Complete Save Product Pipeline Matrix
     */
    public function save_product($data)
    {
        $query = $this->db->table('cyb_products');

        // Compile information package payload array cleanly
        $productInfo = isset($data['info']) ? $data['info'] : [];
        
        // ========================================================================
        // CRUCIAL REFIX: EXTRACT CORRECTLY FROM ['info'] OR FALLBACK TO ROOT 
        // ========================================================================
        $productInfo['overviewEyebrow'] = $data['info']['overviewEyebrow'] ?? ($data['overviewEyebrow'] ?? '');
        $productInfo['overviewTitle']   = $data['info']['overviewTitle'] ?? ($data['overviewTitle'] ?? '');

        $productInfo['partnershipSubheading']  = $data['info']['partnershipSubheading'] ?? ($data['partnershipSubheading'] ?? 'Strategic Value');
        $productInfo['partnershipTitle']       = $data['info']['partnershipTitle'] ?? ($data['partnershipTitle'] ?? 'Why Our Partnerships Matter');
        $productInfo['partnershipDescription'] = $data['info']['partnershipDescription'] ?? ($data['partnershipDescription'] ?? '');
        // ========================================================================

        if (!empty($data['id'])) {
            $query->where('id', $data['id'])->update($productInfo);
            $product_id = $data['id'];
        } else {
            $query->insert($productInfo);
            $product_id = $this->db->insertID();
        }

        // 2. Dynamic Repeater System: Use Cases (cyb_product_feature)
        $query1 = $this->db->table('cyb_product_feature');
        $query1->where('product_id', $product_id)->delete();

        if (!empty($data['featureTitle'])) {
            $num = count($data['featureTitle']);
            for ($i = 0; $i < $num; $i++) {
                if (empty($data['featureTitle'][$i])) continue;
                
                $featureArray = [
                    'product_id'  => $product_id,
                    'title'       => $data['featureTitle'][$i],
                    'description' => isset($data['featureDescription'][$i]) ? $data['featureDescription'][$i] : '',
                    'youtube'     => isset($data['featureYoutube'][$i]) ? $data['featureYoutube'][$i] : '',
                    'sort_order'  => !empty($data['featureSortOrder'][$i]) ? $data['featureSortOrder'][$i] : 0,
                    'image'       => !empty($data['featureImages'][$i]) ? $data['featureImages'][$i] : (@$data['feature_old_image'][$i] ?? '')
                ];
                $query1->insert($featureArray);
            }
        }

        // 3. Dynamic Repeater System: Key Features (cyb_product_capabilities)
        $query2 = $this->db->table('cyb_product_capabilities');
        $query2->where('product_id', $product_id)->delete();

        if (!empty($data['capabilitiesTitle'])) {
            $num = count($data['capabilitiesTitle']);
            for ($i = 0; $i < $num; $i++) {
                if (empty($data['capabilitiesTitle'][$i])) continue;

                $capabilitiesArray = [
                    'product_id'  => $product_id,
                    'title'       => $data['capabilitiesTitle'][$i],
                    'description' => isset($data['capabilitiesDescription'][$i]) ? $data['capabilitiesDescription'][$i] : '',
                    'sort_order'  => !empty($data['capabilitiesSortOrder'][$i]) ? $data['capabilitiesSortOrder'][$i] : 0
                ];
                $query2->insert($capabilitiesArray);
            }
        }

        // 4. Dynamic Repeater System: Additional Images (cyb_product_images)
        $query3 = $this->db->table('cyb_product_images');
        $query3->where('product_id', $product_id)->delete();

        if (!empty($data['imageSortOrder'])) {
            $num = count($data['imageSortOrder']);
            for ($i = 0; $i < $num; $i++) {
                $imagesArray = [
                    'product_id' => $product_id,
                    'sort_order' => !empty($data['imageSortOrder'][$i]) ? $data['imageSortOrder'][$i] : 0,
                    'image'      => !empty($data['images'][$i]) ? $data['images'][$i] : (@$data['old_image'][$i] ?? '')
                ];
                $query3->insert($imagesArray);
            }
        }

        // 5. Dynamic Repeater System: Stacking Cards (cyb_product_partnership_cards)
        $query4 = $this->db->table('cyb_product_partnership_cards');
        $query4->where('product_id', $product_id)->delete();

        // Ensure we explicitly pull using identical keys passed from controller
        $pCardTitles     = isset($data['partnerCardTitle']) ? $data['partnerCardTitle'] : [];
        $pCardDescs      = isset($data['partnerCardDesc']) ? $data['partnerCardDesc'] : [];
        $pCardIcons      = isset($data['partnerCardIcon']) ? $data['partnerCardIcon'] : [];
        $pCardSortOrders = isset($data['partnerCardSortOrder']) ? $data['partnerCardSortOrder'] : [];

        if (!empty($pCardTitles) && is_array($pCardTitles)) {
            $num = count($pCardTitles);
            for ($i = 0; $i < $num; $i++) {
                // Ensure row title isn't completely empty before database write
                if (empty(trim($pCardTitles[$i]))) continue;
                
                $query4->insert([
                    'product_id'  => $product_id,
                    'title'       => esc($pCardTitles[$i]),
                    'description' => isset($pCardDescs[$i]) ? esc($pCardDescs[$i]) : '',
                    'icon_class'  => !empty($pCardIcons[$i]) ? $pCardIcons[$i] : 'fas fa-handshake',
                    'sort_order'  => !empty($pCardSortOrders[$i]) ? (int)$pCardSortOrders[$i] : 0
                ]);
            }
        }

        return $product_id;
    }
}